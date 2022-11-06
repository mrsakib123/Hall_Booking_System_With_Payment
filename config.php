

<?php

require('stripe-php-master/init.php');

$publishableKey="pk_test_51Lh5QzFu0wLVbnlWUNOjBGmrSowIp5BdvFuwhVUgxbfXjmy5OK82qvKZr1S79W6M2qiTjqHhPgq1DQ0rLGlWD5k600y4RBPcU9";

$secretKey="sk_test_51Lh5QzFu0wLVbnlWNv2zyyV3wRCDFx9gKqibG9T8vxpS9x0dqVtWloQ8qv4IjLNSBa4MTc5KcfQXinUetA5RdVJM00nXYMQnEk";

\Stripe\stripe::setApiKey($secretKey);

?>