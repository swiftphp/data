<?php
namespace swiftphp\orm;

/**
 * 数据映射接口
 * @author Tomix
 *
 */
interface IMapping
{
    /**
     * 根据类名获取表名
     * @param string $entityClass
     */
    function getTableName($entityClass);

    /**
     * 获取所有字段名
     * @param string $entityClass
     */
    function getFieldNames($entityClass);

    /**
     * 获取所有列名
     * @param string $entityClass
     */
    function getColumnNames($entityClass);

    /**
     * 根据列名获取字段名
     * @param string $entityClass
     * @param string $columnName
     */
    function getFieldName($entityClass,$columnName);

    /**
     * 根据字段名获取列名
     * @param string $entityClass
     * @param string $fieldName
     */
    function getColumnName($entityClass,$fieldName);
    
    /**
     * 根据字段名获取字段类型
     * @param string $entityClass
     * @param string $fieldName
     */
    function getFieldType($entityClass,$fieldName);

    /**
     * 替换表达式中的字段名为真实的查询列名
     * @param string $entityClass
     * @param string $expression
     * @param string $appendAlias
     */
    function mapSqlExpression($entityClass, $expression,$appendAlias="");

    /**
     * 获取函数名
     * @param int|string $key
     */
    function getFunctionName($key);
}