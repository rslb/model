<?php

namespace Rslb\Model\Tests;

use Rslb\Model\ModelInterface;
use Rslb\Model\RepositoryInterface;

class TestFileRepository implements RepositoryInterface
{

    public function __construct(private string $path)
    {
    }

    public function save(ModelInterface $model): void
    {
        $body = json_encode($model->toArray());
        file_put_contents($this->path, $body);
    }

    public function reconstitute(string $guid): ModelInterface
    {
        $json = file_get_contents($this->path);
        $arr = json_decode($json, true);

        return TestUser::fromArray($arr);
    }
}