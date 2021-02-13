<template>
    <div class="h-screen w-screen flex items-center justify-center" style="background: url('/imgs/login/wave.svg') bottom left repeat-x">
        <div class="bg-dark-blue-900 xl:bg-dark-blue-800 max-w-screen-xl max-h-screen xl:max-h-content w-full h-full rounded-none xl:rounded-3xl shadow-2xl py-6">
            <div class="w-full h-full flex items-center justify-center flex-col overflow-auto py-6">
                <slot />
            </div>
        </div>
    </div>
</template>