<?php

namespace Kamaro\Ussd\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $guarded = [];

	protected  $table = 'ussd_menus';

    /**
     * Get parent relation
     * @return  self
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

	/**
	 * Get Children Relation
	 * @return  self
	 */
	public function children()
	{
		return $this->hasMany(Menu::class, 'parent_id');
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
