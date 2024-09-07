<?php

namespace Rslb\Model;

interface RepositoryInterface
{
    public function save(ModelInterface $model): void;

    public function reconstitute(string $guid): ModelInterface;

}