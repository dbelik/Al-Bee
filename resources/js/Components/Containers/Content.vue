<template>
    <div class="h-screen w-screen flex items-center justify-center" style="background: url('/imgs/login/wave.svg') bottom left repeat-x">
        <div class="bg-dark-blue-900 lg:bg-dark-blue-800 max-w-screen-xl h-screen lg:h-content w-full rounded-none lg:rounded-3xl shadow-2xl overflow-auto">
            <div class="pb-16 pt-8 lg:py-16 flex flex-col justify-center items-center h-full">
                <slot />
            </div>
        </div>
    </div>
</template>