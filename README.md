# PHP Training

A series of PHP trainings, including SOLID Principles and hopefully more in the near future.

Trainign files are placed in `/web/app/src` folder and the whole project is built upon
 great "Docker running Nginx, PHP-FPM, Composer, MySQL and PHPMyAdmin" start pack. It can be downloaded from https://github.com/nanoninja/docker-nginx-php-mysql

Some examples my not work due to the missing dependencies eg. database, the aim of this training is just to show the proper way of creating better software.

## SOLID Principles

In object-oriented computer programming, SOLID is a mnemonic acronym for five design principles intended to make software designs more understandable, flexible and maintainable.

### SRP - Single Responsibility Principle

- A class should have one and only one reason to change
- Gather together the things that change for the same reasons, separate those things that change for different reasons
- Ultimately: a class should have a single responsibility and that responsibility should be entirely encapsulated by the class

Extra resources: https://blog.cleancoder.com/uncle-bob/2014/05/08/SingleReponsibilityPrinciple.html

### OCP - Open-Closed Principle

- Entities should be open for extension, but closed for modification
- Open for extension - it should be simple to change the behaviour of a particular entity (class)
- Closed for modification - change behaviour without modifying source  code;  this is a goal, hard to achieve, but something we should strive for

**Solution**: modify the behaviour through the extension

**How?**

_“When you have a module that you want to extend without modifying separate the extensible behaviour behind an interface and flip the dependencies” - Robert C. Martin, “Clean Code” author_

**A side note**: _Extension_ keyword is much broader in this context and allows class extension through composition as well, not just inheritance.

Extra resources: https://springframework.guru/principles-of-object-oriented-design/open-closed-principle/

### LSP - Liskov Substitution Principle

- Objects in a program should be replaceable with instances of their subtypes without altering the correctness of that program
- If an override method does nothing or just throws an exception, then the code  probably violates the LSP
- A list of ways to adhere  to the LSP:
    - Signature must match
    - Preconditions can’t be greater
    - Post conditions at least equal to
    - Exception types must match

Solutions:
- correct inheritance hierarchy
- interface segregation

### ISP - Interface Segregation Principle

- ISP states that a client should not be forced to implement an interface that it doesn’t use
- Thus many client-specific interfaces are better than one general-purpose interface
- ISP splits interfaces that are very large (fat) into smaller and more specific ones so that clients will only have to know about the methods that are of interest to them
- Such shrunken interfaces are also called role interfaces
- ISP is intended to keep a system decoupled and thus easier to refactor, change, and redeploy

### DIP - Dependency Inversion Principle

Conventional application architecture follows a top-down design approach where a high-level problem is broken into smaller parts. In other words, the high-level design is described in terms of these smaller parts. As a result, high-level modules that gets written directly depend on the smaller (low-level) modules.

DIP says instead:

- Depend on abstractions, not on concretions
- Dependency Inversion != Dependency Injection
- High level modules should not depend on low level modules, instead they should depend on abstractions
- Low level modules should also depend on abstractions
- High level code - isn’t as concerned with details
- Low level code - is more concerned with details and specifics

All of this is about decoupling the code
