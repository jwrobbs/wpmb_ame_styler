# wpmb_ame_styler

This plugin adds 2 features to (Admin Menu Editor)[https://wordpress.org/plugins/admin-menu-editor/].

1. By using AME to create section titles in the menu, you can create section that toggle open.
2. Do some basic styling of the menu items.

## Status: usable

I make no promises and offer no warranty.

## Instructions

### 0. Plan

You need to decide how you want the menu organized. Every section needs a header and a class. Keep it simple.

Example: I like to group my content together. It has a header called "Content" and a class prefix of "content".

### 1. Add headers and arrange menu items.

Use the Admin Menu Editor to create section headers. Set it to Target Page: none. Rearrange the menu items into the groups and order you want.

### 2. Add classes

Still in Admin Menu Editor, add classes to the headers and items.

The class for the headers is <the section's class>-menu-section-header. The class for the items is <the section's class>-menu-section-item.

Example: Based on my previous example, my header Content gets the class "content-menu-section-header". The menu items like Pages, Posts, etc. get the class "content-menu-section-item".

When x-menu-section-header is clicked, the visibility for x-menu-section-item is toggled.

### 3. Customization

The plugin has a basic options panel: 4 color options: header text , header background, active header text, and active header background.

## To Do

Let's be honest. I'll never touch this again.

- Add message to activation.php
- add update script
