@extends('layouts.main')

@section('content') 
  <p> This is zurb foundation style. </p>
  
 <form method="post">
      <fieldset class="stacked login">

        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" placeholder="me@example.com"
                 autocapitalize="off" autocorrect="off" autofocus="autofocus" />
        </div> <!-- /.field -->

        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" />
        </div> <!-- /.field -->

        <div class="button-bar group">
          <input type="submit" value="Log in" />
          <a href="javascript:;">I forgot my password</a>
        </div> <!-- /.button-bar -->

      </fieldset> <!-- /.login -->
    </form>
 
@stop

