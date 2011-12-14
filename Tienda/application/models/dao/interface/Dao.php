<?php

/**
 * Interfaz general para los DAOS con metodos comunes
 * 
 * @author Victor
 */
interface Dao {
    /**
     * Metodo para guardar una entidad
     * 
     * @param Object $entity Entidad que se desea guardar en la bd
     * @return Boolean
     */
   public function save($entity);
   
   /**
    * Metodo para borrar una entidad 
    * 
    * @param Integer $id Identificador de la entidad
    * @return Boolean
    */
   public function delete($id);
   
   /**
    * Metodo para recuperar una entidad por su Id
    * 
    * @param Integer $id Identificador de la entidad
    * @return Object
    */
   public function getById($id);
   
   /**
    * Metodo para contar todos registros de la bd
    * 
    * @return Integer Numero de entidades que existen en la bd
    */
   public function countAll();
   
   /**
    * Metodo para recuperar todos los registros de la bd
    * 
    * @return array Array de entidadas existentes en la base de datos
    */
   public function getAll();
   
   /**
    * Metodo para buscar coincidencias basandose en una entidad de ejemplo
    * 
    * @param Object $entity Entidad que se usara de ejemplo en la busqueda
    * @return array Array de entidadas existentes en la base de datos
    */
   public function searchByExample($entity);
   
   /**
    * Metodo para buscar por ejemplo estableciendo un limite un orden y un offset
    * 
    * @param Object $entity Entidad que se usara como criterio de busqueda
    * @param String $orderBy Campo por el cual se desea ordenar los resultados
    * @param String $order Orden en que se desea obtener los resultados
    * @param Integer $limit Limite de resultados que se desea obtener
    * @param Integer $start Apartir de que registro se debe comenzar
    * @return array El array de entidades encontrados
    */
   public function searchByExamplePaged($entity, $orderBy, $order, $limit, $offset);
   
   /**
    * Metodo para contar las entidadas existentes en la base de datos usando
    * una entidad como ejemplo
    * 
    * @param Object Entidad que se usura como criterio de busqueda
    * @return Integer Numero de entidades que coinciden con el criterio de busqueda
    */
   public function countByExample($entity);
   
}