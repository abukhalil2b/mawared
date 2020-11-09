<?php

namespace App\Http\Controllers;
use App\Book;
use App\Cate;
use Illuminate\Http\Request;

class LibraryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function bookIndex() {
		$books = Book::paginate(50);
		return view('library.book.index', compact('books'));
	}

	public function bookCreate() {
		$cates = Cate::all();
		return view('library.book.create', compact('cates'));
	}

	public function bookStore(Request $request) {

		$this->validate($request,
			['title' => 'required', 'cate_id' => 'required']
		);

		$book = Book::create($request->except('_token'));
		return redirect()->route('library.book.index')->with(['status' => 'تم اضافة الكتاب']);
	}

	public function bookEdit($id) {
		$book = Book::find($id);
		$cates = Cate::all();
		return view('library.book.edit', compact('book', 'cates'));
	}
	public function bookUpdate(Request $request) {
		// return $request->all();
		$this->validate($request,
			['title' => 'required', 'id' => 'required', 'cate_id' => 'required']
		);
		Book::find($request->id)->update($request->except(['_token', 'id']));
		return redirect()->route('library.book.index');
	}

	/**
	 * Cate
	 */
	public function cateCreate() {
		$cates = Cate::all();
		return view('library.cate.create', compact('cates'));
	}

	public function cateStore(Request $request) {
		$this->validate($request,
			['title' => 'required']
		);
		Cate::create($request->except('_token'));
		return redirect()->route('library.cate.create');
	}

	public function cateEdit($id) {
		$cate = Cate::find($id);
		return view('library.cate.edit', compact('cate'));
	}
	public function cateUpdate(Request $request) {
		$cate = Cate::find($request->id);
		$cate->update($request->except(['_token', 'id']));
		return redirect()->route('library.cate.index');
	}
}
