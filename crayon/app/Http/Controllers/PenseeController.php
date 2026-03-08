<?php

namespace App\Http\Controllers;

use App\Models\Pensee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PenseeController extends Controller
{
    // ADZ: afficher la liste complete des pensees (plus recentes d'abord).
    public function index(): View
    {
        $pensees = Pensee::latest()->get();

        return view('index', compact('pensees'));
    }

    // ADZ: valider puis enregistrer une nouvelle pensee.
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'contenu' => ['required', 'string'],
        ]);

        Pensee::create($validated);

        return redirect()->route('pensees.index');
    }

    // ADZ: supprimer la pensee ciblee par son ID (route model binding).
    public function destroy(Pensee $pensee): RedirectResponse
    {
        $pensee->delete();

        return redirect()->route('pensees.index');
    }
}
