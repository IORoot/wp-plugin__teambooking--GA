<?php

//  ┌─────────────────────────────────────────────────────────────────────────┐ 
//  │                                                                         │░
//  │       Fire an event when a customer makes a purchase of a class.        │░
//  │                                                                         │░
//  │                  Requires TEAMBOOKING for this action.                  │░
//  │                                                                         │░
//  └─────────────────────────────────────────────────────────────────────────┘░
//   ░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░

add_action('tbk_reservation_email_to_admin', 'analytics_goal_hit_class_booking', 10, 2);

function analytics_goal_hit_class_booking($email, $reservation){

        // create new object
        $GA = new send_analytics();

        /**
         * Fire an analytics event
         * 
         * Category = 'class booking'
         * Action = 'Beginner Class'
         * Label = 'A Person'
         * Value = 10
         */
        $GA->send_analytics_event(
            'class booking',
            $reservation->getServiceName(),
            $reservation->getCustomerDisplayName(),
            $reservation->getPrice()
        );

    return;
}