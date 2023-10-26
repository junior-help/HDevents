<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('welcome', ['events' => $events]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'mimetypes:image/jpeg,image/png,image/jpg,image/gif|file|max:2048',
        ]);

        if ($validatedData) {
            // ... código para criar o evento se a validação for bem-sucedida ...
            $event = new Event;

            $event->title = $request->input('title');
            $event->city = $request->input('city');
            $event->private = $request->input('private');
            $event->description = $request->input('description');
            $event->items = $request->items;
            $event->date = $request->date;
            $event->time = $request->input('time');

            // Verifica se uma imagem foi enviada no formulário
            if ($request->hasFile('photo')) {
                // Armazena a imagem na pasta 'event_photos' do sistema de arquivos 'public'
                $event->photo_path = $request->file('photo')->store('event_photos', 'public');
            
                // Use o Intervention Image para redimensionar a imagem
                $image = Image::make('storage/app/public/' . $event->photo_path);
                $image->fit(1200, 1000, function ($constraint) {
                    $constraint->upsize(); // Redimensiona a imagem para cima, se necessário
                });
            
                // Aumente a qualidade da imagem para 95 (ajuste conforme necessário)
                $image->save('storage/app/public/' . $event->photo_path, 100);
            
                // Aplique nitidez (sharpen) à imagem
                $image->sharpen(15);
            
                $event->photo_path = 'event_photos/' . $request->file('photo')->hashName();
            }
            
            $event->save();

            return redirect('/')->with('msg', 'Evento criado com sucesso.');
        } else {
            return redirect()->back()->withInput()->withErrors(['photo' => 'Por favor, envie uma imagem com uma das seguintes extensões: jpeg, png, jpg, gif, e com tamanho máximo de 2MB.']);
        }
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }
}
