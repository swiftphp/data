<?php
namespace swiftphp\data;

/**
 * DAO接口
 * @author Tomix
 *
 */
interface IDao
{
    /**
     * 获取最后一次产生的异常
     * @return \Exception|null
     */
    function getException();

    /**
     * 获取当前的事务状态
     * @return bool
     */
    function getTransactionStatus();

    /**
     * 开始事务
     */
    function beginTransaction();

    /**
     * 提交事务
     */
    function commitTransaction();

    /**
     *回滚事务
     */
    function rollbackTransaction();

    /**
     * 根据ID获取实体
     * @param string $entityClass  实体类型名
     * @param mixed $id            实体ID,复合ID以键值对数组形式传入
     * @return object
     */
    function get($entityClass,$id);
    
    /**
     * 根据过滤条件获取唯一记录
     * @param string $entityClass
     * @param string $filter
     * @param array $params
     */
    function getOne($entityClass, $filter = null,array $params=null);

    /**
     * 加载数据
     * @param object $entity 实体对象
     * @param string|array $fields 查询字段集,用实体属性名表示,留空表示按主键主段查询
     * @throws \Exception
     * @return boolean
     */
    function load(&$entity, $fields = null);

    /**
     * 保存或更新记录,成功则返回true
     * @param object $entity
     * @return boolean
     */
    function persist($entity);
    
    /**
     * 删除实体
     * @param object $entity   实体对象
     */
    function delete($entity);
    
    /**
     * 根据实体ID删除数据
     * @param string $entityClass  实体类型名
     * @param mixed $id             实体ID,复合ID以键值对数组形式传入
     * @return object
     */
    function deleteById($entityClass,$id);

    /**
     * 批量更新数据
     * @param string $entityClass       实体类型名
     * @param array  $fieldValues       更新的字段值,键为字段名,值为字段值
     * @param string $filter            过滤表达式
     * @param array $params             输入参数
     */
    function updates($entityClass,$fieldValues=[], $filter = null, array $params=null);

    /**
     * 批量删除数据
     * @param string $entityClass       实体类型名
     * @param string $filter            过滤表达式
     * @param array $params             输入参数
     */
    function deletes($entityClass, $filter = null, array $params=null);

    /**
     * 数据查询
     * @param string $entityClass       实体类型名
     * @param string $filter            过滤表达式
     * @param array $params             输入参数
     * @param string $orderBy           排序表达式
     * @param number $offset            起始记录号
     * @param number $limit             返回记录数
     * @param string $groupBy           分组表达式
     */
    function list($entityClass, $filter = null,array $params=null, $orderBy = null, $offset = null, $limit = null,$groupBy=null);

    /**
     * 查询计数
     * @param string $entityClass   实体类型名
     * @param string $filter        过滤表达式
     * @param array $params         输入参数
     * @return integer
     */
    function count($entityClass, $filter = null,array $params=null);

    /**
     * 数据聚合统计($funcMap,$groupFields至少一个不为空;函数名必须与对应的数据库一致)
     * @param string|object $entityClass 实体类名
     * @param string $filter             过滤表达式
     * @param array $params              输入参数
     * @param string $sort               排序表达式
     * @param array $funcMap             统计函数,键为函数名,值为统计字段(值为数组时,第一个元素为统计字段,第二个为返回字段)
     * @param array $groupFields         分组统计字段,可选
     */
    function group($entityClass,$filter = null,array $params=null,$order=null,$funcMap=[],$groupFields=[]);

    /**
     * 执行原生SQL语句
     * @param string $sql   SQL语句
     * @param array $params 输入参数
     */
    function sqlUpdate($sql,array $params=null);

    /**
     * 原生SQL查询,返回二维数组
     * @param string $sql               SQL语句
     * @param array $params             输入参数
     * @param number $offset            起始记录号
     * @param number $limit             返回记录数
     */
    function sqlQuery($sql,array $params=null, $offset = null, $limit = null);

    /**
     * 获取映射工具
     * @return IMapping
     */
    function getMapping():IMapping;
}

