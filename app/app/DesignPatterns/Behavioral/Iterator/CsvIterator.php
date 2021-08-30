<?php

declare(strict_types=1);

namespace App\DesignPatterns\Behavioral\Iterator;

/**
 * Итератор CSV-файлов.
 */
class CsvIterator implements \Iterator
{
    private const ROW_SIZE = 4096;

    /**
     * Указатель на CSV-файл.
     *
     * @var resource
     */
    protected $filePointer;

    /**
     * Текущий элемент, который возвращается на каждой итерации.
     */
    protected array|bool|null $currentElement = null;

    /**
     * Счётчик строк.
     */
    protected ?int $rowCounter = null;

    /**
     * Конструктор пытается открыть CSV-файл. Он выдаёт исключение при ошибке.
     */
    public function __construct(
        string $file,
        protected string $delimiter = ','
    ) {
        try {
            $this->filePointer = fopen($file, 'rb');
        } catch (\Exception $e) {
            throw new \Exception('The file "' . $file . '" cannot be read.');
        }
    }

    /**
     * Этот метод возвращает текущую CSV-строку в виде двумерного массива.
     */
    public function current(): array|bool
    {
        $this->currentElement = fgetcsv($this->filePointer, self::ROW_SIZE, $this->delimiter);
        $this->rowCounter++;

        return $this->currentElement;
    }

    /**
     * Этот метод проверяет, достигнут ли конец файла.
     *
     * @return bool Возвращает true при достижении EOF, в ином случае false.
     */
    public function next(): bool
    {
        if (is_resource($this->filePointer)) {
            return !feof($this->filePointer);
        }

        return false;
    }

    /**
     * Этот метод возвращает номер текущей строки.
     */
    public function key(): int
    {
        return $this->rowCounter;
    }

    /**
     * Этот метод проверяет, является ли следующая строка допустимой.
     */
    public function valid(): bool
    {
        if (!$this->next()) {
            if (is_resource($this->filePointer)) {
                fclose($this->filePointer);
            }

            return false;
        }

        return true;
    }

    /**
     * Этот метод сбрасывает указатель файла.
     */
    public function rewind(): void
    {
        $this->rowCounter = 0;
        rewind($this->filePointer);
    }
}
