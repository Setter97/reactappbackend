<?php
use Illuminate\Http\Request;

define('DIRECTIONS', array('asc', 'desc'));



function sortLink(Request $request, $column, $display, $url)
{

    $direction = $request->has('direction') ? $request->direction:'';


        if ($direction == 'asc')
            $direction = 'desc';
        else
            $direction = 'asc';



    $params = $request->only('page');

    if ($column != '')
        $params = $params + ['sort' => $column] + ['direction' => $direction];
    return '<a href="'.url($url).'?'.http_build_query($params).'"><i class="fa fa-fw fa-sort"></i>'.$display.'</a>';
}

function sortLink2(Request $request, $column, $display)
{
    $sort = $request->has('sort') ? $request->sort:'';
    $direction = $request->has('direction') ? $request->direction:'';

    if ($sort == $column){

        if ($direction == 'asc')
            $direction = 'desc';
        else
            $direction = 'asc';
    }


    $params = $request->only('page');

    if ($sort != '')
        $params = $params + ['sort' => $column] + ['direction' => $direction];
    return '<a href="'.url('announcements').'?'.http_build_query($params).'"><i class="fa fa-fw fa-sort"></i>'.$display.'</a>';
}


function getSort(Request $request, array $sortables)
{
    $sort = $request->has('sort') ? $request->sort:'id';
    return in_array($sort,$sortables)?$sort:'id';
}

function getDirection(Request $request)
{
    $direction = $request->has('direction') ? $request->direction:'desc';
    return in_array($direction,DIRECTIONS)?$direction:'desc';

}

