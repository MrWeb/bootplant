@block(['title' => "Principale"])
{{-- --}}@item(['item' => "Dashboard", "link" => "dashboard", 'icon' => "donut_large"])@enditem
@dropdown(['item' => "Anagrafiche", "link" => "#!", 'icon' => 'person_pin'])
          @dropdownitem(['item' => 'Clienti', 'link' => 'customers'])@enddropdownitem
          @dropdownitem(['item' => 'Concessionarie', 'link' => 'agents'])@enddropdownitem
          @dropdownitem(['item' => 'Carrozzerie', 'link' => 'autoshops'])@enddropdownitem
          @dropdownitem(['item' => 'Assicurazioni', 'link' => 'insurances'])@enddropdownitem
@enddropdown
@item(['item' => "Sinistri", "link" => "accidents", 'icon' => 'broken_image'])@enditem
{{-- @item(['item' => "Agenda", "link" => "events", 'icon' => 'today'])@enditem --}}
{{-- @item(['item' => "Listini", "link" => "events", 'icon' => 'format_list_bulleted'])@enditem --}}
{{-- @item(['item' => "Operatori", "link" => "events", 'icon' => 'people'])@enditem --}}
@endblock

@can('edit users')
{{-- --}}@block(['title' => "Amministrazione"])
    {{-- --}}@dropdown(['item' => "Impostazioni", "link" => "calendar", 'icon' => 'settings'])
              {{-- --}}@dropdownitem(['item' => 'Impostazioni Generali', 'link' => '#!'])@enddropdownitem
              {{-- --}}@dropdownitem(['item' => 'Utenti', 'link' => '#!'])@enddropdownitem
    {{-- --}}@enddropdown
{{-- --}}@endblock
@endcan
