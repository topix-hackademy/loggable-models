TODO

# Configurazione


per esportare la migrazione usare 

        php artisan vendor:publish


Configura un modello per essere loggabile

        class VApplication extends Model implements ModelLogInterface
        {
            use ModelLogTrait;
            

A questo punto tutto è pronto.

# Utilizzo normale


ogni oggetto con ModelLogTrait ha accesso a tutti i metodi di convenienza dell'interfaccia standard di psr3 log interface.

Ad esempio

            $vapplication->warning("Application not found on every machine");

aggiunge un warning all'oggetto.

per ottenere log di un certo tipo è sufficiente usare il metodo del level al plurale

            $vapplication->warnings()
            
per ottenere gli oggetti con un tipo di log si possono usare i query scope per ogni level

            VApplication::hasWarnings()->get()