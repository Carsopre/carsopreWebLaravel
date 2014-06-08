<<<<<<< HEAD
<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{	
			$this->layout = View::make($this->layout);
		}
	}

=======
<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{	
			$this->layout = View::make($this->layout);
		}
	}

>>>>>>> 3aeecd3f4c1a5b83f1cc16a6bceef425f07df988
}