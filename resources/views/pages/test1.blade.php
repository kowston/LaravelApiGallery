<x-app-layout>


    <x-card>
        <p>Test</p>

        <x-secondary-button>
            {{ $data }}
        </x-secondary-button>

        <x-card-test-one>
<h2>What Can JavaScript Do?</h2>

<p id="demo">JavaScript can change HTML content.</p>

<button type="button" onclick="document.getElementById('demo').innerHTML = 'Hello JavaScript!'">Click Me!</button>
        </x-card-test-one>
    </x-card>

</x-app-layout>

