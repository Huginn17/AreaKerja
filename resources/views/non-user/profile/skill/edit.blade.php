@extends('layouts.index')
@section('content')
    <div class="min-h-screen bg-gray-50 py-6 mt-10 sm:py-10">
        <div class="w-full max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6 sm:p-8">

            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-200 pb-3 sm:pb-4 mb-5 sm:mb-6">
                <h1 class="text-xl sm:text-2xl font-semibold text-gray-800">Edit Skill</h1>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-3 py-2 rounded mb-4 text-sm sm:text-base">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('skill.update', $DS->id) }}" method="POST" class="space-y-4 sm:space-y-5">
                @csrf
                @method('PUT')

                <!-- Skill -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Skill</label>
                    <input type="text" name="skill" value="{{ old('skill', $DS->skill) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
                </div>

                <!-- Experience -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Experience Level</label>
                    <input type="text" name="experience_level"
                        value="{{ old('experience_level', $DS->experience_level) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 sm:px-4 sm:py-2 text-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-between gap-3 sm:gap-4 mt-4">
                    <button type="submit"
                        class="px-5 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 shadow text-sm sm:text-base text-center">
                        Simpan
                    </button>

                    <a href="{{ route('profile.index') }}"
                        class="px-5 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 shadow text-sm sm:text-base text-center">
                        Batal
                    </a>
                </div>

            </form>
        </div>
    </div>
@endsection
