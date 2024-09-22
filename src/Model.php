<?php

namespace Rslb\Model;

use DateTime;
use DateTimeZone;
use Exception;

abstract class Model implements ModelInterface
{

    private bool $isDeleted = false;

    private ?DateTime $deletedAt = null;

    private array $pendingEvents = [];
    private DateTime $createdAt;
    private DateTime $updatedAt;


    public function __construct(
        private readonly string $guid,
    )
    {
        $this->createdAt = $this->updatedAt = new DateTime();
    }


    public function toArray(): array
    {

        if ($this->isDeleted()) {

            $isDeleted = 'yes';
            $deletedAt = $this->getDeletedAt()->format('U.u');
            $deletedAtTimezone = $this->getCreatedAt()->getTimezone()->getName();

        } else {

            $isDeleted = 'no';
            $deletedAt = 'undefined';
            $deletedAtTimezone = 'undefined';
        }

        $base = [
            'guid' => $this->getGuid(),

            'is_deleted' => $isDeleted,

            'deleted_at' => $deletedAt,
            'deleted_at_timezone' => $deletedAtTimezone,


            'created_at' => $this->getCreatedAt()->format('U.u'),
            'created_at_timezone' => $this->getCreatedAt()->getTimezone()->getName(),

            'updated_at' => $this->getUpdatedAt()->format('U.u'),
            'updated_at_timezone' => $this->getUpdatedAt()->getTimezone()->getName(),
        ];

        $className = get_class($this);  // Pobiera pełną nazwę klasy
        $lastBackslashPosition = strrpos($className, '\\');  // Znajduje ostatni backslash

        if ($lastBackslashPosition !== false) {
            $classNameWithoutLastPart = substr($className, 0, $lastBackslashPosition);
        } else {
            $classNameWithoutLastPart = $className;
        }

        $serializerClass = $classNameWithoutLastPart . '\\Serialization\\Serializer';
        if (!class_exists($serializerClass)) {
            throw new Exception("Klasa $serializerClass nie istnieje.");
        }

        // Sprawdzenie, czy klasa istnieje
        if (!class_exists($serializerClass)) {
            throw new Exception("Klasa $serializerClass nie istnieje.");
        }

        return [

            'base' => $base,
            'data' => $serializerClass::serialize($this),

        ];


    }

    public static function fromArray(array $data): ModelInterface
    {

        $className = static::class;  // Pobiera pełną nazwę klasy
        $lastBackslashPosition = strrpos($className, '\\');  // Znajduje ostatni backslash

        if ($lastBackslashPosition !== false) {
            $classNameWithoutLastPart = substr($className, 0, $lastBackslashPosition);
        } else {
            $classNameWithoutLastPart = $className;
        }

        $serializerClass = $classNameWithoutLastPart . '\\Serialization\\Deserializer';
        if (!class_exists($serializerClass)) {
            throw new Exception("Klasa $serializerClass nie istnieje.");
        }

        // Sprawdzenie, czy klasa istnieje
        if (!class_exists($serializerClass)) {
            throw new Exception("Klasa $serializerClass nie istnieje.");
        }


        $guid = $data['base']['guid'];

        $createdAt = DateTime::createFromFormat('U.u', $data['base']['created_at']);
        $createdAt->setTimezone(new DateTimeZone($data['base']['created_at_timezone']));

        $updatedAt = DateTime::createFromFormat('U.u', $data['base']['updated_at']);
        $updatedAt->setTimezone(new DateTimeZone($data['base']['updated_at_timezone']));

        if ($data['base']['is_deleted'] == 'yes') {

            $isDeleted = true;
            $deletedAt = DateTime::createFromFormat('U.u', $data['base']['deleted_at']);
            $deletedAt->setTimezone(new DateTimeZone($data['base']['deleted_at_timezone']));
        } else {

            $isDeleted = false;
            $deletedAt = null;
        }

        return $serializerClass::deserialize($guid, $createdAt, $updatedAt, $isDeleted, $deletedAt, $data['data']);
    }


    public function getGuid(): string
    {
        return $this->guid;
    }

    protected function raise($event): void
    {

        $this->pendingEvents[] = $event;
    }

    public function releaseEvents(): array
    {
        $events = $this->pendingEvents;
        $this->pendingEvents = [];
        return $events;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }


    public function delete(DateTime $deletedAt = null): void
    {
        if ($deletedAt === null)
        {
            $deletedAt = new DateTime();
        }

        $this->isDeleted = true;
        $this->deletedAt = $deletedAt;
    }

    public function isDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }


}