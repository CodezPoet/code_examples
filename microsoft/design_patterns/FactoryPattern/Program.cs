using FactoryPattern;

// Emulate user input
IPayment payment = PaymentFactory.create(PaymentMethod.CreditCard);
payment.Pay(1000.00);