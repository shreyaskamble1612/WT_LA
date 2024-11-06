<?php
$age = 25;

if ($age >= 18) {
    echo "You are an adult\n";
}
if ($age >= 21) {
    echo "You can
drink in the US\n";
} else {
    echo "You cannot drink in the US\n";
}
$score = 85;
if ($score >= 90) {
    echo "Grade: A\n";
} elseif ($score >= 80) {
    echo "Grade:
B\n";
} elseif ($score >= 70) {
    echo "Grade: C\n";
} else {
    echo "Grade: F\n";
}
$isLoggedIn = true;
$isAdmin = true;
if ($isLoggedIn) {
    if ($isAdmin) {
        echo
            "Welcome Admin!\n";
    } else {
        echo "Welcome User!\n";
    }
}
$dayOfWeek = 3;
switch
($dayOfWeek) {
    case 1:
        echo "Monday\n";
        break;
    case 2:
        echo "Tuesday\n";
        break;
    case 3:
        echo "Wednesday\n";
        break;
    case 4:
        echo "Thursday\n";
        break;
    case 5:
        echo "Friday\n";
        break;
    case 6:
    case 7:
        echo "Weekend\n";
        break;
    default:
        echo
            "Invalid day\n";
}
$counter = 1;
while ($counter <= 5) {
    echo "Counter:
$counter\n";
    $counter++;
}
$num = 1;
do {
    echo "Number: $num\n";
    $num++;
} while
($num <= 3);
for ($i = 0; $i < 5; $i++) {
    echo "Iteration: $i\n";
}
for (
    $i = 1;
    $i <= 3;
    $i++
) {
    for ($j = 1; $j <= 3; $j++) {
        echo "$i,$j | ";
    }
    echo "\n";
}
$fruits = ["apple", "banana", "orange"];
foreach ($fruits as $fruit) {
    echo
        "$fruit\n";
}
$person = ["name" => "John", "age" => 30, "city" => "New York"];
foreach ($person as $key => $value) {
    echo "$key: $value\n";
}
for (
    $i = 1;
    $i
    <= 10;
    $i++
) {
    if ($i == 5) {
        break;
    }
    echo "$i ";
}
echo "\n";
for (
    $i = 1;
    $i
    <= 5;
    $i++
) {
    if ($i == 3) {
        continue;
    }
    echo "$i ";
}
echo "\n";
$status = 404;
$message = match ($status) { 200, 201 => 'Success', 400 => 'Bad Request', 404 =>
    'Not Found', 500 => 'Server Error', default => 'Unknown Status',
};
echo "HTTP
Status $status: $message\n";
$username = null;
$displayName = $username ??
    'Guest';
echo "Welcome, $displayName\n";
$age = 20;
$canVote = ($age >= 18) ?
    'Yes' : 'No';
echo "Can vote? $canVote\n";
try {
    $result = 10 / 0;
    echo "Result:
$result\n";
} catch (DivisionByZeroError $e) {
    echo "Error: Cannot divide by
zero\n";
} finally {
    echo "This always executes\n";
} ?>

<?php if ($age >= 18): ?> Adult
<?php else: ?>
    Minor
<?php endif; ?>

<?php foreach ($fruits as $fruit): ?>
    <div><?= $fruit; ?></div>
<?php endforeach; ?>