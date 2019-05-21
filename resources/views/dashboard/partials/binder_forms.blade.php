<div class="card">
    <header class="card-header">
        <p class="card-header-title">
            <a class="has-text-dark" href="#">Ongelezen klapper formulieren</a>
        </p>
    </header>
    <div class="card-table">
        <div class="content">
            <table class="table is-fullwidth is-narrow">
                @forelse($binderForms as $form)
                        <tr class="message-row" data-target="{{ route('binder-form', ['binderform_id' => $form->id]) }}">
                            <td class="has-text-centered"> <i class="fas fa-address-book"></i> </td>
                            <td class="has-text-centered"> {{ $form->name }} </td>
                        </tr>
                    </tbody>
                @empty
                    <td>Geen (nieuwe) klapper formulieren</td>
                @endforelse
            </table>
        </div>
    </div>
    @if(method_exists($binderForms, 'links'))
        <footer class="card-footer" style="display: block; padding: 1em;">
            {{ $binderForms->links('vendor.pagination.bulma', ['bulmaClasses' => 'is-small is-left', 'next' => 'Volgende', 'previous' => 'Vorige']) }}
        </footer>
    @endif
</div>
