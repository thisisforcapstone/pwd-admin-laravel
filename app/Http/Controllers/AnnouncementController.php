<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AnnouncementController extends Controller
{
    // ✅ GET all announcements - for Flutter or Web
    public function index(Request $request)
    {
        $announcements = Announcement::latest()->get();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'data' => $announcements
            ]);
        }

        return view('index', compact('announcements'));
    }

    // ✅ CREATE new announcement - for Flutter or Web
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'nullable',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'target_audience' => 'required|in:all,presidents,members',
        ]);

        $announcement = Announcement::create([
            'title' => $request->title,
            'location' => $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'target_audience' => $request->target_audience,
            'is_attended' => false,
        ]);

        // --- LOGGING CODE ---
        Log::info('Announcement created', [
            'admin_id' => auth()->id(),
            'title' => $request->title,
            'location' => $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'target_audience' => $request->target_audience,
            'announcement_id' => $announcement->id,
        ]);
        // --- END LOGGING CODE ---

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Announcement created successfully!',
                'data' => $announcement
            ]);
        }

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully!');
    }

    // ✅ UPDATE announcement
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            // Ginawang optional ang body
            'body' => 'nullable',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after_or_equal:start_time',
            'target_audience' => 'required|in:all,presidents,members',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update([
            'title' => $request->title,
            'body' => $request->body,
            'location' => $request->location,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'target_audience' => $request->target_audience,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Announcement updated successfully!',
                'data' => $announcement
            ]);
        }

        return redirect()->route('announcements.index')->with('success', 'Announcement updated.');
    }

    // ✅ DELETE announcement
    public function destroy(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Announcement deleted successfully!'
            ]);
        }

        return redirect()->route('announcements.index')->with('success', 'Announcement deleted.');
    }

    // ✅ MARK as attended
    public function markAsAttended($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->update(['is_attended' => true]);

        return response()->json([
            'status' => 'success',
            'message' => 'Marked as attended!',
            'data' => $announcement
        ]);
    }

    // ✅ Example: show announcements page for Web
    public function showAnnouncements()
    {
        $jsonResponse = '{"status":"success","data":[{"id":14,"title":"Free checkup","body":"to all","location":"SEPNAS","start_time":"2025-05-13 12:00:00","end_time":"2025-05-13 15:00:00","created_at":"2025-05-02T03:00:13.000000Z","updated_at":"2025-05-02T03:00:13.000000Z","target_audience":"all"},{"id":13,"title":"Sample","body":"Sample","location":"SEPNAS","start_time":"2025-05-15 10:46:00","end_time":"2025-05-15 12:00:00","created_at":"2025-05-02T02:40:45.000000Z","updated_at":"2025-05-02T02:40:45.000000Z","target_audience":"members"}]}';
        
        $data = json_decode($jsonResponse, true);

        return view('announcement', ['announcements' => $data['data']]);
    }
}
