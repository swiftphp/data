<?php
namespace swiftphp\data\db;

/**
 * 数据访问接口
 * @author Tomix
 *
 */
interface IDatabase
{
    /**
     * 连接
     */
    function connect();

    /**
     * 关闭
     */
    function close();

    /**
     * ping
     */
    function ping();

    /**
     * 获取最后一次产生的异常
     * @return \Exception
     */
    function getException();

    /**
     * 返回第一行第一列数据
     * @param unknown $sql
     * @param array $params
     */
    function scalar($sql,array $params=[]);

    /**
     * 返回一行数据集
     * @param string $sql
     */
    function reader($sql,array $params=[]);

    /**
     * 执行非查询
     * @param string $sql
     * @return void
     */
    function execute($sql,array $params=[]);

    /**
     * 执行返回记录集
     * @param string $sql
     * @param int  $offset
     * @param int  $limit
     * @return array
     */
    function query($sql,array $params=[],$offset=0,$limit=-1);

    /**
     * 获取最后插入记录的ID
     */
    function getInsertId();

    /**
     * 开始事务
     */
    function begin();

    /**
     * 提交事务
     */
    function commit();

    /**
     * 回滚事务
     */
    function rollback();
}

