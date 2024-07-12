<?php
namespace App\Filter;

use Illuminate\Support\Facades\Auth;
use TakiElias\Tablar\Menu\Filters\FilterInterface;

class RolePermissionMenuFilter implements FilterInterface{
  public function transform($item){
    return $this->isVisible($item) ? $item : null;
  }
  protected function isVisible($item){
    $user = Auth::user();
    if (isset($item['hasAnyRole']) && !in_array($user->rol,$item['hasAnyRole'])) {
      return false;
  }

  if (isset($item['hasRole']) && $user->rol != $item['hasRole']) {
      return false;
  }

  if (isset($item['hasAnyPermission']) && !$user->isAbleTo($item['hasAnyPermission'])) {
      return false;
  }

  return true;
  }
}