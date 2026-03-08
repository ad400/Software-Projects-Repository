<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crayon & Bois</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <style>
        /* ADZ: palette "crayon sur bois". */
        :root {
            --wood: #02315c;
            --wood-dark: #858584;
            --paper: #137d97;
            --wax: #f8c3a0;
            --wax-soft: #f8c3a0;
            --danger: #1d1d8f;
        }

        * {
            box-sizing: border-box;
        }

        body {
            /* ADZ: fond anime bleu ciel. */
            margin: 0;
            min-height: 100vh;
            padding: 2rem 1rem;
            font-family: "Indie Flower", "Comic Sans MS", cursive;
            color: var(--wax);
            background:
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.5) 0, transparent 38%),
                linear-gradient(120deg, #87ceeb, #ffffff, #abf3fe, #a7dcff);
            background-size: 160% 160%;
            animation: skyShift 14s ease-in-out infinite;
            display: grid;
            place-items: center;
        }

        @keyframes skyShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .board {
            /* ADZ: zone principale style papier jauni. */
            width: min(860px, 96vw);
            background: var(--paper);
            border: 4px solid #d2be8f;
            border-radius: 14px;
            box-shadow:
                0 12px 30px rgba(0, 0, 0, 0.35),
                inset 0 0 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }

        h1 {
            margin: 0 0 1rem;
            font-size: clamp(2rem, 6vw, 3.4rem);
            letter-spacing: 1px;
            color: var(--wax-soft);
            text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.12);
        }

        form {
            display: grid;
            gap: .8rem;
            margin-bottom: 1.4rem;
        }

        textarea {
            width: 100%;
            min-height: 110px;
            border: 2px dashed #f8c3a0;
            border-radius: 10px;
            padding: .8rem;
            font-size: 1.35rem;
            font-family: inherit;
            color: var(--wax);
            background: rgba(255, 252, 240, 0.86);
            resize: vertical;
        }

        textarea:focus {
            outline: 3px solid rgba(214, 214, 214, 0.3);
        }

        .errors {
            margin: 0;
            padding-left: 1.2rem;
            color: #fa0b0b;
            font-size: 1.05rem;
        }

        .btn {
            width: fit-content;
            border: 0;
            border-radius: 999px;
            padding: .45rem 1.1rem;
            font-family: inherit;
            font-size: 1.2rem;
            cursor: pointer;
            color: #fff8eb;
            background: linear-gradient(180deg, #f8c3a0, #3a2011);
            box-shadow: 0 3px 0 #241207;
        }

        .pensees {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: .8rem;
        }

        .pensee {
            /* ADZ: bloc individuel de pensee. */
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: .8rem;
            padding: .8rem .9rem;
            border-radius: 10px;
            background: rgba(255, 247, 225, 0.8);
            border-left: 6px solid var(--wood);
        }

        .pensee p {
            margin: 0;
            font-size: 1.45rem;
            line-height: 1.25;
            color: var(--wax);
            word-break: break-word;
        }

        .delete-btn {
            border: 0;
            border-radius: 8px;
            background: #c44949;
            color: #fff;
            font-family: inherit;
            font-size: 1.05rem;
            padding: .25rem .55rem;
            cursor: pointer;
        }

        .empty {
            margin: .8rem 0 0;
            font-size: 1.2rem;
            color: #f8c3a0;
        }
    </style>
</head>
<body>
    <main class="board">
        <h1>Crayon & Bois</h1>

        {{-- ADZ: formulaire d'ajout d'une pensee --}}
        <form method="POST" action="{{ route('pensees.store') }}">
            @csrf
            <label for="contenu">Ecris une pensee :</label>
            <textarea id="contenu" name="contenu" placeholder="Une idee, un souvenir, un plan..." required>{{ old('contenu') }}</textarea>

            {{-- ADZ: affichage des erreurs de validation --}}
            @if ($errors->any())
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <button class="btn" type="submit">Ajouter</button>
        </form>

        {{-- ADZ: affichage conditionnel de la liste --}}
        @if ($pensees->isEmpty())
            <p class="empty">Aucune pensee pour l'instant.</p>
        @else
            <ul class="pensees">
                @foreach ($pensees as $pensee)
                    <li class="pensee">
                        <p>{{ $pensee->contenu }}</p>
                        {{-- ADZ: suppression via methode DELETE spoofee --}}
                        <form method="POST" action="{{ route('pensees.destroy', $pensee) }}">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" type="submit">Supprimer</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
</body>
</html>
