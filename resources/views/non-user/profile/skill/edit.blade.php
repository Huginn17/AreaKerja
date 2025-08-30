@extends('layouts.index')
@section('content')
    <div class="min-h-screen bg-gray-50 py-10">
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-200 pb-4 mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Edit Skill</h1>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('skill.update', $DS->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Skill -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Skill</label>
                    <input type="text" name="skill" value="{{ old('skill', $DS->skill) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
                </div>

                <!-- Experience -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Experience Level</label>
                    <input type="text" name="experience_level"value="{{ old('experience_level', $DS->experience_level) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
                </div>
                <!-- Action -->
                <button type="submit" class="px-5 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 shadow">
                    Simpan
                </button>
        </div>
        </form>
    </div>
    </div>
@endsection
