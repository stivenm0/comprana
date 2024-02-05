<span
class="shrink-0 rounded-full bg-yellow-500 px-2 font-mono text-md font-medium tracking-tight text-white">
    {{request('section') != '' ? request('section') : $product->section->name }}
</span>