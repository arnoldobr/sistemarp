<?php
/**
 * smarty plugin
 * -------------------------------------------
 * File:     modifier.fa.php
 * Type:     modifier
 * Name:     fa
 * Pourpose: outputs an icon of font-awesome
 * -------------------------------------------
 */
function smarty_modifier_fa($icon){
	return "<i class=\"fa fa-{$icon}\"></i>";
}
