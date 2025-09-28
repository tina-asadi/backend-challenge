<?php
/**
 * PHP Challenge: Acronym Generator
 * Author: Tina Asadi
 * Date: 2025-09-28
 *
 * Takes a string input and returns its acronym.
 */

// Function to generate acronym
function generateAcronym(string $phrase): string {
    // Replace hyphens with spaces, remove punctuation
    $cleaned = preg_replace('/[^a-zA-Z0-9\s]/', '', str_replace('-', ' ', $phrase));
    $words = explode(' ', $cleaned);

    $acronym = '';
    foreach ($words as $word) {
        if (!empty($word)) {
            $acronym .= strtoupper($word[0]);
        }
    }
    return $acronym;
}

// Start a PHP session to store previous results
session_start();
if (!isset($_SESSION['results'])) {
    $_SESSION['results'] = [];
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['phrase'])) {
    $phrase = trim($_POST['phrase']);
    $acronym = generateAcronym($phrase);
    $_SESSION['results'][] = ['phrase' => $phrase, 'acronym' => $acronym];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acronym Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            background: #f8f9fa;
            color: #333;
        }
        h1 {
            color: #444;
        }
        form {
            margin-bottom: 1.5rem;
        }
        input[type="text"] {
            padding: 0.5rem;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 0.5rem 1rem;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 1rem;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Acronym Generator</h1>
    <form method="POST">
        <input type="text" name="phrase" placeholder="Enter a phrase..." required>
        <button type="submit">Generate</button>
    </form>

    <?php if (!empty($_SESSION['results'])): ?>
        <table>
            <tr>
                <th>Phrase</th>
                <th>Acronym</th>
            </tr>
            <?php foreach ($_SESSION['results'] as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['phrase']) ?></td>
                    <td><strong><?= htmlspecialchars($row['acronym']) ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
