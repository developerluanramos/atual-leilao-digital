import './bootstrap';
// import 'livewire-sortable';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

window.Alpine = Alpine

Alpine.plugin(persist)

Alpine.start()
