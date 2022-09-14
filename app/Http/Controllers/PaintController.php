<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaintRequest;
use App\Http\Requests\UpdatePaintRequest;
use App\Models\Department;
use App\Models\Paint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PaintController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paints = Paint::sortable()
        ->with('user', 'department')
        ->orderBy('created_at', 'asc')
        ->paginate(10);

        return view('paints.index', ['paints' => $paints]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('paints.create', ['departments' => Department::all()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaintRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaintRequest $request)
    {
            $validatedData = $request->validated();
            Paint::create($validatedData);

            $paint = Paint::with('department', 'user')->latest()->first();

            $data = [
                'id'            => $paint->id,
                'user'          => $paint->user->user_name,
                'email'         => $paint->user->email,
                'department'    => $paint->department->department_name,
                'rooms'         => $paint->rooms,
                'status'        => $paint->status,
                'start'         => $paint->date_start,
                'end'           => $paint->date_end,
            ];

            //Mail::to('belica@khn.cz')->send(new PaintingMail($data));

            $request->session()->flash('success', 'Rezervace malování úspěšně vytvořena !');
            return redirect(route('user.paints.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function show(Paint $paint, Request $request)
    {
        return view('paints.show', ['paint' => $paint]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function edit(Paint $paint, Request $request)
    {
        if (!$paint) {
            $request->session()->flash('error', 'Tato rezervace neexistuje nebo ji už nemůžete editovat !');
            return redirect(route('user.paints.index'));
        }

        if (Gate::allows('is-admin')) {
            $paint = Paint::find($paint->id);
        }

        return view('paints.edit', [
            'departments' => Department::all(),
            'paint' => $paint
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaintRequest  $request
     * @param  \App\Models\Ppaint  $paint
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaintRequest $request, Paint $paint)
    {

		$oldpaint = Paint::find($paint->id);
        $validatedData = $request->validated();
        $paint = Paint::with('department', 'user')->find($paint->id);
        $paint->update($validatedData);

            $data = [
				'id'            => $paint->id,
                'user'          => $paint->user->user_name,
                'email'         => $paint->user->email,
				'olddepartment' => $oldpaint->department->department_name,
				'oldrooms'      => $oldpaint->rooms,
                'oldstart'      => $oldpaint->date_start,
                'oldend'        => $oldpaint->date_end,
                'department'    => $paint->department->department_name,
                'rooms'         => $paint->rooms,
                'start'         => $paint->date_start,
                'end'           => $paint->date_end,
                'status'        => $paint->status,
            ];

        //Mail::to('belica@khn.cz', $paint->user->email)->send(new PaintUpdateMail($data));

        $request->session()->flash('success', 'Rezervace '. $paint->id .' úspěšně aktualizována!');
        return redirect(route('user.paints.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paint  $paint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paint $paint, Request $request)
    {
        $paint = Paint::with('department', 'user')->find($paint->id);

        $data = [
                'id'            => $paint->id,
                'user'          => $paint->user->user_name,
                'email'         => $paint->user->email,
                'department'    => $paint->department->department_name,
                'rooms'         => $paint->rooms,
                'status'        => $paint->status,
                'start'         => $paint->date_start,
                'end'           => $paint->date_end,
        ];

        //Mail::to('belica@khn.cz')->send(new PaintDelete($data));

        $paint->delete();

        $request->session()->flash('success', 'Rezervace úspěšně odstraněna!');
        return redirect()->back();
    }
}
