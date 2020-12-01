<?php 

namespace Kamaro\Ussd\Models;

use Illuminate\Database\Eloquent\Model;

class UssdMenu extends Model{

	public  $guarded = [];

	/**
	 * Get parent relation
	 * @return  self
	 */
	public function parent()
	{
		return $this->belongsTo(UssdMenu::class, 'parent_id', 'id');
	}

	/**
	 * Get Children Relation
	 * @return  self
	 */
	public function children()
	{
		return $this->hasMany(UssdMenu::class, 'parent_id');
	}

	/**
	 * Get parent Name
	 * @return  
	 */
	public function getParentNameAttribute(): string
	{
		return empty($this->parent)? __('Root') : $this->parent->name;
	}
}