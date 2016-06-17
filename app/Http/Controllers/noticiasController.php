<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatenoticiasRequest;
use App\Models\noticias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;
use Schema;

class noticiasController extends AppBaseController
{

	/**
	 * Display a listing of the Post.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if(Auth::user()->rol==="admin") {


			$query = noticias::query();
			$columns = Schema::getColumnListing('$TABLE_NAME$');
			$attributes = array();

			foreach ($columns as $attribute) {
				if ($request[$attribute] == true) {
					$query->where($attribute, $request[$attribute]);
					$attributes[$attribute] = $request[$attribute];
				} else {
					$attributes[$attribute] = null;
				}
			};

			$noticias = $query->get();
		}
		else
		{
			Session::flash("flash_danger", "Error Sin privilegios suficientes!");
			return Redirect("/");
		}

        return view('noticias.index')
            ->with('noticias', $noticias)
            ->with('attributes', $attributes);
	}
	public function GetNoticias()

	{
		$noticias = noticias::all()->take(20);



			return response()->json($noticias);


	}

	/**
	 * Show the form for creating a new noticias.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->rol==="admin") {
			return view('noticias.create');
		}
		else
		{
			Session::flash("flash_danger", "Error Sin privilegios suficientes!");
			return Redirect("/");
		}
	}

	/**
	 * Store a newly created noticias in storage.
	 *
	 * @param CreatenoticiasRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatenoticiasRequest $request)
	{
        $input = $request->all();

		$noticias = noticias::create($input);

		Flash::message('noticia creada.');

		return redirect(route('noticias.index'));
	}

	/**
	 * Display the specified noticias.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$noticias = noticias::findOrFail($id);

		if(empty($noticias))
		{
			Flash::error('noticias existen noticias');
			return redirect(route('noticias.index'));
		}

		return view('noticias.show')->with('noticias', $noticias);
	}

	/**
	 * Show the form for editing the specified noticias.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$noticias = noticias::find($id);

		if (Auth::user()->rol === "admin") {
			if (empty($noticias)) {
				Flash::error('noticias not found');
				return redirect(route('noticias.index'));
			}

			return view('noticias.edit')->with('noticias', $noticias);
		}else
		{
			Session::flash("flash_danger", "Error Sin privilegios suficientes!");
			return Redirect("/");
		}
	}

	/**
	 * Update the specified noticias in storage.
	 *
	 * @param  int    $id
	 * @param CreatenoticiasRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreatenoticiasRequest $request)
	{
		/** @var noticias $noticias */
		$noticias = noticias::find($id);

		if(empty($noticias))
		{
			Flash::error('noticias not found');
			return redirect(route('noticias.index'));
		}

		$noticias->fill($request->all());
		$noticias->save();

		Flash::message('noticias actualizada con exito.');

		return redirect(route('noticias.index'));
	}

	/**
	 * Remove the specified noticias from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		/** @var noticias $noticias */
		$noticias = noticias::find($id);

		if(empty($noticias))
		{
			Flash::error('noticias not found');
			return redirect(route('noticias.index'));
		}

		$noticias->delete();

		Flash::message('noticias deleted successfully.');

		return redirect(route('noticias.index'));
	}
}
