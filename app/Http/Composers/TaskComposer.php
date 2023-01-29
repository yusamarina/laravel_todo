<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class TaskComposer
{
  public function compose(View $view) {
    $view->with('view_message', 'this view is "' . $view->getName() . '"!' );
  }
}
