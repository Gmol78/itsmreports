<?php

/*
 * 
 */

namespace model;

/**
 * Таблица. Класс содержит ассоциативный массив таблицы,  
 * методы формирования ячеек и строк, методы получения и установки значений
 *
 * @author i.molochnikov
 */
class Table {
    
    /**
     * Массив колонок таблицы
     * 
     * @var array 
     */
    private $columns = [];
    
    
    /**
     * Ассоциативный двумерный массив таблицы
     *  
     * @var array 
     */
    private $table = [];
    
    
    /**
     * Метод получает массив колонок, формирует в свойстве $this->columns, 
     * ассоциативный массив, где в качестве ключей используются значения 
     * полученного массива, в качестве значений этих ключей - пустые строки  
     * 
     * @param array $cols - массив колонок таблицы
     */
    public function addColumns(array $cols) {
        foreach ($cols as $col) {
            $this->columns[$col] = '';
        }
    }
    
    
    /**
     * Метод получает массив строк и формирует в свойстве $this->table, двумерный
     * асоциативный массив из строк и колонок.
     * 
     * @param array $rows
     */    
    public function addRows (array $rows) {
        foreach ($rows as $row) {
            $this->table[$row] = $this->columns;            
        }             
    }
    
    
    /**
     * Метод возвращает двумерный ассоциативный массив таблицы
     * 
     * @return array
     */
    public function getTable () {
        return $this->table;
    }
    
    
    /**
     * Метод принимает ключ строки и возвращает ассоциативный массив строки
     * таблицы
     * 
     * @param string $row
     * @return array
     */
    public function getRow ($row) {
        return $this->table[$row];        
    }
    
    
    /**
     * Метод принимает ключ строки, ключ колонки и возвращает значение ячейки
     *    
     * @param string $row
     * @param string $col
     * @return string
     */
    public function getCell($row, $col) {
        if(isset($this->table[$row][$col])) {
            return $this->table[$row][$col];        
        }
        else {
            throw new \Exception('попыка получить не существующую ячейку таблицы');
        }
    }
    
    
    /**
     * Метод принимает ключ строки, ключ колонки, значение ячейки и устанавливает
     * значение ячейки
     * 
     * @param string $row
     * @param string $col
     * @param string|integer|float $value
     * @throws \Exception
     */
    public function setCell($row, $col, $value) {        
        if(isset($this->table[$row][$col])) {
            $this->table[$row][$col] = $value;
        }
        else {
            throw new \Exception('попыка установить не существующую ячейку таблицы');
        }
    }  
}
