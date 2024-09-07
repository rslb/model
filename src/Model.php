<?php

namespace Rslb\Model;

use Exception;

abstract class Model implements ModelInterface
{
    private array $pendingEvents = [];


    public function __construct(private readonly string $guid)
    {
    }


    public function toArray(): array
    {
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

        return $serializerClass::serialize($this);

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

        return $serializerClass::deserialize($data);
    }


    public function getGuid():string
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


}