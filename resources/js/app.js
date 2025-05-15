import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'
import 'livewire-sortable';
window.Alpine = Alpine

Alpine.plugin(persist)

Alpine.start()
