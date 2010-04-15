<?php
/*this is  your state model
 *state table in database should like:id,name
 *and business table in database:id,name,state_id
 */
class State extends AppModel
{
    var $name = 'State';

    var $hasMany = array(
        'Joints'=>array(
                'className'=>'joints',
                'foreignKey'=>'state_id',
                )
	);   //this means a State can hasMany Businesses while a Business only belongs to one State

}

?>