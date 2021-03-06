<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('admin.live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('type', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->email.'</td>        
         <td>'.$row->type.'</td>
          <td>

          <!--
            <form action="admin.update" method="POST" enctype="multipart/form-data"> 
             
              <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Role Declare:</strong>
                          
                              <select name="type" id="type" class="form-control">
                                  <option value=""> -- Select One --</option>
                                  <option value="user">User</option>
                                  <option value="manager">Manager</option>
                                  <option value="admin">Admin</option>
                              </select>
                         
                      </div>
                    </div>
        
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
     
            </form>
            -->

          </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
