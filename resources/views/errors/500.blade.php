<div class="content">
    <div class="title">{{$exception}}</div>
    @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
        Raven.showReportDialog({
            eventId: '{{ $sentryID }}',

            // use the public DSN (dont include your secret!)
            dsn: 'https://8dd95d9b094c476ebaae366cea52e32f@sentry.io/137322'
        });
        </script>
    @endunless
</div>