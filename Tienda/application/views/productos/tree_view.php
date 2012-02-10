<?php echo "<?xml version='1.0' encoding='utf-8'?>" ?>
<rows>
    <page>1</page>
    <total>1</total>
    <records>1</records>
<!--    <row>
        <cell>0</cell> id del nodo 
        <cell><![CDATA[<a style="padding-right: 120px; cursor: pointer;" href="<?php //echo base_url(MODULE_PRODUCTOS) ?>">Destacados</a>]]></cell> nodo 
        <cell>0</cell> nivel 
        <cell>NULL</cell> id del padre 
        <cell>true</cell> es hoja? 
        <cell>false</cell> expandido? 
    </row>-->
    <?php foreach ($menuNodes as $menuNode):?>
    <row>
        <cell><?php echo $menuNode["id"]; ?></cell><!-- id del nodo -->
        <cell><![CDATA[<?php echo $menuNode["text"] ?>]]></cell><!-- nodo -->
        <cell><?php echo $menuNode["level"] ?></cell><!-- nivel -->
        <cell><?php echo $menuNode["idFather"] ?></cell><!-- id del padre -->
        <cell><?php echo $menuNode["isLeaf"] ?></cell><!-- es hoja? -->
        <cell><?php echo $menuNode["expanded"] ?></cell><!-- expandido? -->
        <cell><?php echo $menuNode["loaded"] ?></cell><!-- cargado? -->
    </row>
    <?php endforeach; ?>
</rows>