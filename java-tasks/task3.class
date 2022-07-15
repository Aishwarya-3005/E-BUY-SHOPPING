package com.internshala.javaapp;

import java.util.*;
public class task3
{
    public static void main(String args[])
    {
        int withdraw, deposit, balance = 89000;
        Scanner sc = new Scanner(System.in);
        String Id = "xyz", pin = "74912";

        System.out.print("Enter your ATM pin: ");
        String in=sc.nextLine();

        if(in.equals(pin))
        {
            while(true)
            {
                System.out.println("Welcome To The ATM");

                System.out.println("1.For Check Balance \n2.For Withdraw \n3.For Deposit");
                System.out.println("4.For Transfer \n5.For Quit");
                System.out.println("Choose the operation you want to perform:");

                int choice = sc.nextInt();
                switch(choice)
                {
                    case 1:
                        //displaying the total balance of the user
                        System.out.println("Balance: "+balance);
                        System.out.println("");
                        break;

                    case 2:
                        System.out.println("Enter money to be withdrawn:");
                        withdraw = sc.nextInt();
                        if(balance >= withdraw)
                        {
                            balance = balance - withdraw;
                            System.out.println("Please collect your money");
                        }
                        else
                            System.out.println("you have insufficient balance");
                        System.out.println("");
                        break;

                    case 3:
                        System.out.println("Enter your money to be deposited:");
                        deposit = sc.nextInt();
                        balance = balance + deposit;
                        System.out.println("Your Money has been successfully deposited");
                        System.out.println("");
                        break;

                    case 4:
                        System.out.println("Account Based Transfer");
                        System.out.println("Enter the Amount:");
                        int amount = sc.nextInt();

                        if(amount > balance)
                            System.out.println("Transaction Failed");
                        else{
                            System.out.println("The amount transfer successfully");
                            balance = balance - amount;
                        }
                        System.out.println("");
                        break;

                    case 5:
                        //exit from the menu
                        System.out.println("Thank You");
                        System.out.println("Have a nice day!!");
                        System.exit(0);
                }//sc.close
            }
        }//pin
        else
            System.out.println("Invalid PIN");
    }
}
