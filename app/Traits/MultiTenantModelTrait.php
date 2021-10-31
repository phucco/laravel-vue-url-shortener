<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait MultiTenantModelTrait {
	public static function bootMultiTenantModelTrait()
	{
		static::creating(function ($model) {
			$model->slug = strtolower(Str::random(8));
		});
	}

	public function getRouteKeyName()
	{
		return 'slug';
	}
}