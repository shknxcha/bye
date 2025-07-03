<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TanamanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public $status;
    public $message;

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray($request)
    {
        // Pastikan resource bukan boolean atau null
        if (!is_object($this->resource)) {
            return [
                'success' => false,
                'message' => 'Invalid resource data',
                'data' => null,
            ];
        }  
        return [
            'id' => $this->id,
            'jenis_tanaman' => $this->whenLoaded('jenis_tanaman'),
            'suhu_udara' => $this->suhu_udara,
            'kelembapan_udara' => $this->kelembapan_udara,
            'suhu_tanah' => $this->suhu_tanah,
            'kelembapan_tanah' => $this->kelembapan_tanah,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}