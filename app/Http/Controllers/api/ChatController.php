<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessage;
use App\Http\Resources\MessageCollection;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(StoreMessage $request)
    {
        try {
            $contact = Contact::find($request->contact_id);
            if($contact) {
                Message::create($request->all());
                return response()->json(['message' => 'Mensagem criada com sucesso!'], 201);
            } else {
                return response()->json(['message' => 'Contato não existente'], 404);
            }
        } catch (\Exception $e){
            return response()->json(['message' => "Erro Inesperado: {$e->getMessage()}"], 500);
        }
    }

    public function chat() {
        MessageCollection::withoutWrapping();
        return MessageCollection::collection(Message::with('contact')->orderBy('created_at')->get());
    }
}
