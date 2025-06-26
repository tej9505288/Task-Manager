# User Manual - Teja's Task Manager

## Table of Contents
1. [Getting Started](#getting-started)
2. [User Interface Overview](#user-interface-overview)
3. [Account Management](#account-management)
4. [Task Management](#task-management)
5. [Kanban Board](#kanban-board)
6. [Advanced Features](#advanced-features)
7. [Troubleshooting](#troubleshooting)
8. [Keyboard Shortcuts](#keyboard-shortcuts)
9. [Best Practices](#best-practices)
10. [FAQ](#faq)

---

## Getting Started

### First Time Setup
1. **Access the Application**
   - Open your web browser
   - Navigate to: `http://localhost:8000`
   - You'll see the welcome page

2. **Create an Account**
   - Click "Register" in the top navigation
   - Fill in your details:
     - **Name:** Your full name
     - **Email:** Your email address
     - **Password:** Create a strong password
   - Click "Register" to create your account

3. **Verify Your Email** (if enabled)
   - Check your email for verification link
   - Click the link to verify your account

4. **Login to Your Account**
   - Enter your email and password
   - Click "Login" to access your dashboard

### Dashboard Overview
Once logged in, you'll see:
- **Navigation Bar:** Top menu with your name and logout option
- **Main Heading:** "Teja's Task Manager"
- **Add Task Button:** Blue button to create new tasks
- **Kanban Board:** Three columns for task organization

---

## User Interface Overview

### Navigation Bar
```
┌─────────────────────────────────────────────────────────────┐
│ 🎯 Task Manager                    👤 Teja ▼              │
│                                                             │
│ [My Tasks] [Add Task]                    [Profile Menu]    │
└─────────────────────────────────────────────────────────────┘
```

**Elements:**
- **Brand Logo:** Kanban icon with "Task Manager"
- **My Tasks:** Link to your task dashboard
- **Add Task:** Quick access to create new tasks
- **Profile Menu:** Your name with dropdown options
  - **Logout:** Sign out of your account

### Kanban Board Layout
```
┌─────────────┐  ┌─────────────┐  ┌─────────────┐
│   To Do     │  │ In Progress │  │    Done     │
│   (0)       │  │    (0)      │  │    (1)      │
│             │  │             │  │             │
│ ┌─────────┐ │  │ ┌─────────┐ │  │ ┌─────────┐ │
│ │ Task 1  │ │  │ │ Task 2  │ │  │ │ Task 3  │ │
│ │ [Edit]  │ │  │ │ [Edit]  │ │  │ │ [Edit]  │ │
│ │ [Delete]│ │  │ │ [Delete]│ │  │ │ [Delete]│ │
│ └─────────┘ │  │ └─────────┘ │  │ └─────────┘ │
│             │  │             │  │             │
└─────────────┘  └─────────────┘  └─────────────┘
```

**Columns:**
- **To Do:** Tasks that need to be started
- **In Progress:** Tasks currently being worked on
- **Done:** Completed tasks

---

## Account Management

### Profile Information
Your profile displays:
- **Name:** Your registered name
- **Email:** Your email address
- **Account Status:** Active/Verified status

### Changing Your Password
1. Click on your name in the top-right corner
2. Select "Change Password" (if available)
3. Enter your current password
4. Enter your new password
5. Confirm your new password
6. Click "Update Password"

### Logging Out
1. Click on your name in the top-right corner
2. Click "Logout" from the dropdown menu
3. You'll be redirected to the login page

### Account Security
- **Strong Passwords:** Use a combination of letters, numbers, and symbols
- **Regular Logout:** Always log out when using shared computers
- **Email Verification:** Keep your email address up to date

---

## Task Management

### Creating a New Task

#### Method 1: Using the Add Task Button
1. Click the blue "Add Task" button in the top-right
2. A modal window will appear
3. Fill in the task details:
   - **Title:** Enter a descriptive task name (required)
   - **Status:** Select initial status (To Do, In Progress, or Done)
4. Click "Create Task"
5. Your new task will appear in the selected column

#### Method 2: Quick Add (if available)
1. Click the "+" icon in any column
2. Enter the task title
3. Press Enter to create the task

### Editing a Task
1. Find the task you want to edit
2. Click the "Edit" button on the task card
3. A modal window will open with the current task details
4. Modify the title and/or status
5. Click "Update Task" to save changes

### Deleting a Task
1. Find the task you want to delete
2. Click the "Delete" button on the task card
3. A confirmation dialog will appear
4. Click "Yes, delete it!" to confirm
5. The task will be permanently removed

### Task Information
Each task displays:
- **Title:** The task name
- **Status:** Current status (To Do, In Progress, Done)
- **Created Date:** When the task was created
- **Actions:** Edit and Delete buttons

---

## Kanban Board

### Understanding the Kanban Method
Kanban is a visual project management method that helps you:
- **Visualize Work:** See all your tasks at a glance
- **Limit Work in Progress:** Focus on current tasks
- **Manage Flow:** Move tasks through different stages
- **Improve Continuously:** Identify bottlenecks and improve

### Using Drag and Drop
1. **Moving Tasks:**
   - Click and hold on any task card
   - Drag it to a different column
   - Release to drop the task
   - The task status will automatically update

2. **Visual Feedback:**
   - Task cards become semi-transparent while dragging
   - Drop zones are highlighted
   - Smooth animations show task movement

3. **Status Updates:**
   - Moving to "To Do" = Task needs to be started
   - Moving to "In Progress" = Task is being worked on
   - Moving to "Done" = Task is completed

### Column Management
Each column shows:
- **Column Header:** Status name with icon
- **Task Count:** Number of tasks in that status
- **Task Cards:** Individual tasks in that column
- **Empty State:** Message when no tasks exist

### Task Organization Tips
- **Keep To Do List Short:** Don't overwhelm yourself
- **Focus on In Progress:** Limit to 3-5 active tasks
- **Celebrate Done:** Move completed tasks promptly
- **Regular Review:** Review and reorganize weekly

---

## Advanced Features

### Real-time Updates
- **Automatic Saving:** Changes save instantly
- **No Page Refresh:** Smooth user experience
- **Status Synchronization:** All changes are immediately reflected

### Responsive Design
The application works on all devices:
- **Desktop:** Full-featured experience
- **Tablet:** Optimized touch interface
- **Mobile:** Simplified mobile layout

### Notifications
- **Success Messages:** Green notifications for successful actions
- **Error Messages:** Red notifications for errors
- **Confirmation Dialogs:** SweetAlert2 for important actions

### Keyboard Navigation
- **Tab Navigation:** Use Tab key to navigate between elements
- **Enter Key:** Submit forms and confirm actions
- **Escape Key:** Close modals and cancel actions

---

## Troubleshooting

### Common Issues

#### Can't Login
**Problem:** Unable to access your account
**Solutions:**
1. Check your email and password
2. Ensure Caps Lock is off
3. Clear browser cache and cookies
4. Try resetting your password

#### Tasks Not Saving
**Problem:** Changes aren't being saved
**Solutions:**
1. Check your internet connection
2. Refresh the page and try again
3. Clear browser cache
4. Contact support if problem persists

#### Drag and Drop Not Working
**Problem:** Can't move tasks between columns
**Solutions:**
1. Ensure JavaScript is enabled
2. Try clicking and holding longer
3. Check if you're logged in
4. Refresh the page

#### Page Not Loading
**Problem:** Application won't load
**Solutions:**
1. Check your internet connection
2. Try a different browser
3. Clear browser cache
4. Check if the server is running

### Error Messages

#### "Task not found"
- The task may have been deleted by another user
- Refresh the page to see current data

#### "Unauthorized access"
- You may have been logged out
- Try logging in again

#### "Validation failed"
- Check that all required fields are filled
- Ensure data is in the correct format

---

## Keyboard Shortcuts

### General Navigation
- **Tab:** Navigate between elements
- **Enter:** Submit forms, confirm actions
- **Escape:** Close modals, cancel actions
- **Ctrl + R:** Refresh page
- **Ctrl + F:** Find in page

### Task Management
- **Ctrl + N:** Create new task (if available)
- **Ctrl + S:** Save changes (if available)
- **Delete:** Delete selected task (if available)

### Browser Shortcuts
- **F5:** Refresh page
- **Ctrl + T:** New tab
- **Ctrl + W:** Close tab
- **Ctrl + Shift + R:** Hard refresh

---

## Best Practices

### Task Management
1. **Use Clear Titles:** Make task names descriptive and specific
2. **Regular Updates:** Update task status regularly
3. **Keep It Simple:** Don't overcomplicate task descriptions
4. **Review Regularly:** Weekly review of all tasks

### Organization
1. **Limit Work in Progress:** Don't start too many tasks at once
2. **Move Tasks Promptly:** Update status as work progresses
3. **Clean Up Regularly:** Delete completed tasks or archive them
4. **Use Consistent Naming:** Follow a naming convention

### Productivity Tips
1. **Start with To Do:** Begin each day by reviewing your To Do list
2. **Focus on In Progress:** Limit active tasks to maintain focus
3. **Celebrate Completion:** Move tasks to Done when finished
4. **Weekly Review:** Review and reorganize your board weekly

### Security
1. **Strong Passwords:** Use unique, strong passwords
2. **Regular Logout:** Always log out on shared computers
3. **Keep Updated:** Use the latest browser version
4. **Secure Connection:** Ensure you're using HTTPS

---

## FAQ

### General Questions

**Q: How many tasks can I create?**
A: There's no limit to the number of tasks you can create.

**Q: Can I share tasks with others?**
A: Currently, tasks are private to your account. Team features may be added in the future.

**Q: Can I export my tasks?**
A: Export functionality is planned for future updates.

**Q: Is my data backed up?**
A: Regular backups are performed on the server side.

### Technical Questions

**Q: What browsers are supported?**
A: Modern browsers including Chrome, Firefox, Safari, and Edge.

**Q: Does it work on mobile?**
A: Yes, the application is fully responsive and works on all devices.

**Q: Can I use it offline?**
A: Currently, an internet connection is required. Offline support is planned.

**Q: How secure is my data?**
A: All data is encrypted and protected with industry-standard security measures.

### Feature Questions

**Q: Can I add due dates to tasks?**
A: Due dates are planned for future updates.

**Q: Can I add files to tasks?**
A: File attachments are planned for future updates.

**Q: Can I create task categories?**
A: Task categorization is planned for future updates.

**Q: Can I set task priorities?**
A: Priority levels are planned for future updates.

### Account Questions

**Q: Can I change my email address?**
A: Email change functionality is planned for future updates.

**Q: Can I delete my account?**
A: Account deletion is planned for future updates.

**Q: Can I reset my password?**
A: Yes, use the "Forgot Password" link on the login page.

**Q: Is my email required?**
A: Yes, email is required for account creation and password reset.

---

## Support and Contact

### Getting Help
If you need assistance:
1. **Check this manual** for common solutions
2. **Try troubleshooting** steps listed above
3. **Contact support** if problems persist

### Contact Information
- **Email:** [support@example.com]
- **Documentation:** [Project Documentation]
- **GitHub:** [Repository Issues]

### Feedback
We welcome your feedback to improve the application:
- **Feature Requests:** Suggest new features
- **Bug Reports:** Report any issues you encounter
- **Improvement Ideas:** Share ideas for better user experience

---

**Manual Version:** 1.0  
**Last Updated:** June 26, 2025  
**Application Version:** 1.0.0 