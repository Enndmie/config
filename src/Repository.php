<?php

declare(strict_types=1);

namespace DaBaiCai\Config;

use DaBaiCai\Config\Contract\ConfigInterface;
use Illuminate\Support\Arr;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

use function pathinfo;

class Repository implements ConfigInterface
{
    /**
     * 配置数组.
     */
    protected array $items = [];

    /**
     * 获取[支持点语法].
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return Arr::get($this->items, $key, $default);
    }

    /**
     * 设置[支持点语法]
     */
    public function set(string $key, mixed $value): void
    {
        Arr::set($this->items, $key, $value);
    }

    /**
     * 扫描目录.
     */
    public function scan(string|array $dirs): void
    {
        foreach ((array)$dirs as $dir) {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
            /** @var SplFileInfo $file */
            foreach ($files as $file) {
                if (!$file->isFile()) {
                    continue;
                }
                $path = $file->getRealPath() ?: $file->getPathname();
                if (pathinfo($path, PATHINFO_EXTENSION) !== 'php') {
                    continue;
                }
                $this->loadOne($path);
                gc_mem_caches();
            }
        }
    }

    /**
     * 全部.
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * 加载多个配文件.
     */
    public function load(string|array $files): void
    {
        is_array($files) ? $this->loadMany($files) : $this->loadOne($files);
    }

    public function loadMany(array $files): void
    {
        foreach ($files as $file) {
            $this->loadOne($file);
        }
    }

    /**
     * 加载一个配置文件.
     */
    public function loadOne(string $file): void
    {
        $this->items[pathinfo($file, PATHINFO_FILENAME)] = include_once $file;
    }
}
