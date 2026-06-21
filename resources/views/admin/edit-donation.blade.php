@extends('layouts.admin')

@section('title','Edit Donasi')

@section('content')

<div class="admin-edit-donation">

    <div class="page-header">

        <a href="/admin/donations">

            <i class="bi bi-arrow-left"></i>

            Kembali

        </a>

        <h1>Edit Donasi</h1>

    </div>

    <div class="edit-card">

        <form
            method="POST"
            action="/admin/donations/{{ $donation->id }}/edit"
        >

            @csrf

            <div class="form-group">

                <label>Nama Donasi</label>

                <input
                    type="text"
                    name="title"
                    value="{{ $donation->title }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    name="description"
                    rows="5"
                >{{ $donation->description }}</textarea>

            </div>

            <div class="form-group">

                <label>Jumlah</label>

                <input
                    type="number"
                    name="quantity"
                    value="{{ $donation->quantity }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Alamat Pickup</label>

                <textarea
                    name="pickup_address"
                    rows="3"
                >{{ $donation->pickup_address }}</textarea>

            </div>

            <button
                type="submit"
                class="save-btn"
            >

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

@endsection